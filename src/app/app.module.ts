
import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { HttpModule } from '@angular/http';
/*
* Import components and pages
* Import related modeule
*/


import { HomePage } from '../pages/home/home';
import { SubmissionPage } from '../pages/submission/submission';
import { SubmissiondetailPage } from '../pages/submission/submissiondetail';
import { ReferalPage } from '../pages/referal/referal';
import { ReferfriendPage } from '../pages/referfriend/referfriend';
import { SignupPage } from '../pages/signup/signup';
import { WelcomePage } from '../pages/welcome/welcome';
import { InformationPage } from '../pages/information/information';
import { CreateprojectPage } from '../pages/information/createproject';
import { ProjectdetailPage } from '../pages/information/projectdetail';
import { StackholderinformationPage } from '../pages/information/stackholderinformation';
import { SubmitphotoPage } from '../pages/information/submitphoto';
import { MyProfilePage } from '../pages/my-profile/my-profile';
import { EditprofilePage } from '../pages/my-profile/editprofile';
import { ForgotPasswordPage } from '../pages/forgot-password/forgot-password';
import { MymoneyPage } from '../pages/mymoney/mymoney';
import { ContactPage } from '../pages/contact/contact';
import { TermsPage } from '../pages/terms/terms';
import { HowitworkPage } from '../pages/howitwork/howitwork';
import { ConsultantPage } from '../pages/consultant/consultant';
import { MapPage } from '../pages/map/map';
import { TabsPage } from '../pages/tabs/tabs';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';


import { AuthService } from '../providers/auth-service/auth-service';

@NgModule({
  declarations: [
      MyApp,
      HomePage,
      SubmissionPage,
      SubmissiondetailPage,
      ReferalPage,
      ContactPage,
      SignupPage,
      WelcomePage,
      InformationPage,
      CreateprojectPage,
      ProjectdetailPage,
      StackholderinformationPage,
      TermsPage,
      HowitworkPage,
      SubmitphotoPage,
      TabsPage,
      MyProfilePage,
      MymoneyPage,
      EditprofilePage,
      ForgotPasswordPage,
      ReferfriendPage,
      ConsultantPage,
	  MapPage
  ],

  imports: [
    BrowserModule,
    HttpModule,
    IonicModule.forRoot(MyApp, {
      backButtonText: 'Back',
      backButtonIcon:'arrow-back',
      iconMode: 'ios',
      modalEnter: 'modal-slide-in',
      modalLeave: 'modal-slide-out',
      tabsPlacement: 'bottom',
      pageTransition: 'ios-transition'
    }
  )],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    SubmissionPage,
    SubmissiondetailPage,
    ReferalPage,
    ContactPage,
    SignupPage,
    WelcomePage,
    InformationPage,
    CreateprojectPage,
    ProjectdetailPage,
    StackholderinformationPage,
    TermsPage,
    HowitworkPage,
    SubmitphotoPage,
    TabsPage,
    MyProfilePage,
    MymoneyPage,
    EditprofilePage,
    ForgotPasswordPage,
    ReferfriendPage,
    ConsultantPage,
	MapPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}, AuthService
  ]
})
export class AppModule {}
