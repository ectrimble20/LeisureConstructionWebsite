<?php

namespace Leisure\Application\Controller;

use Leisure\Application\Model\Service\ServiceFactory;
use Leisure\Application\View\ErrorView;
use Leisure\Application\View\IndexView;
use Leisure\Application\View\SuccessView;
use Leisure\Application\View\View;
use Leisure\Library\Common\Audit;
use Leisure\Library\Log\Log;
use Leisure\Library\Mailer\Mailer;

class IndexController extends Controller {

    protected $doNotValidate = true;

    public function GET()
    {
        Log::Get()->debug(__METHOD__);
        $pageContents = ServiceFactory::Index($this->params)->GetIndexContent();
        $this->params->Set('gallery_main_screen_content',$pageContents['gallery_main_screen_content']);
        $this->params->Set('gallery_residential_content',$pageContents['gallery_residential_content']);
        $this->params->Set('gallery_commercial_content',$pageContents['gallery_commercial_content']);
        $this->params->Set('endorser_content', $pageContents['endorser_content']);
        $this->params->Set('about_header', $pageContents['about_header']);
        $this->params->Set('about_lead_in', $pageContents['about_lead_in']);
        $this->params->Set('about_body', $pageContents['about_body']);
        return new IndexView($this->params);
    }

    public function PUT()
    {
        return $this->throwError("Invalid Request Method");
    }

    public function DELETE()
    {
        return $this->throwError("Invalid Request Method");
    }

    public function POST()
    {
        Log::Get()->debug(__METHOD__);
        //we're not too concerned if we don't have a "name" but we must have a comment and an email address
        if( $this->params->HasValue('contact_email') === false){
            Log::Get()->alert("Invalid contact attempt made, no email address specified");
            $this->params->Set('error_message', 'An Error Occurred Trying To Process Your Request');
            return new ErrorView($this->params);
        }
        if( $this->params->HasValue('contact_comments') === false){
            Log::Get()->alert("Invalid contact attempt made, no comment specified");
            $this->params->Set('error_message', 'An Error Occurred Trying To Process Your Request');
            return new ErrorView($this->params);
        }
        //from here we need an email hook and then a "thank you for contacting us" template page
        if( Mailer::SendEmailToPrimary($this->params->Get('contact_name'), $this->params->Get('contact_email'), $this->params->Get('contact_comments')) === false ){
            Audit::critical("Email server error detected, please review log file for details");
            $this->params->Set('error_message', 'An Error Occurred Trying To Process Your Request');
            return new ErrorView($this->params);
        }
        $this->params->Set('success_message', 'Thank you for contacting us, we will get back to you as soon as possible!<br><br><a href="/">Return to home page</a>');
        return new SuccessView($this->params);

    }

}