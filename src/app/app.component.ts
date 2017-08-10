
import { Component, ViewChild } from '@angular/core';
import { Nav, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { HomeService} from './services/home.service';
import { SplashScreen } from '@ionic-native/splash-screen';
import { TabsPage } from '../pages/tabs/tabs';
import { HomePage } from '../pages/home/home';
import { SubmissionPage } from '../pages/submission/submission';
import { ReferalPage } from '../pages/referal/referal';
import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { TermsPage } from '../pages/terms/terms';
import { HowitworkPage } from '../pages/howitwork/howitwork';
import { WelcomePage } from '../pages/welcome/welcome';
import { MyProfilePage } from '../pages/my-profile/my-profile';
import { MapPage } from '../pages/map/map';

@Component({
  templateUrl: 'app.html',
  providers:[HomeService]
})

export class MyApp {
  @ViewChild(Nav) nav: Nav;

    rootPage:any = HomePage;
    pages: Array<{title: string, component: any}>;
    footerpages: Array<{title: string, component: any}>;
    username: any;
    
    constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen) {
     this.initializeApp();
      this.username = localStorage.username;
     
     // used for an example of ngFor and navigation
     this.pages = [
       { title: 'Home', component: WelcomePage },
       { title: 'My Submissions', component: SubmissionPage },
       { title: 'My Referrals', component: ReferalPage },
       { title: 'How it Works', component: HowitworkPage },
     ];

     this.footerpages = [
        { title: 'Terms and Conditions', component: TermsPage },
	      { title: 'Contact Us', component: ContactPage },
	      { title: 'Log Out', component: HomePage },
     ];

   }

   initializeApp() {
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  openPage(page) {
    this.nav.setRoot(page.component);
  }

  openFooterPage(page) {
    //this.nav.setRoot(footerpages.component);
  }

   myprofile(){
	  //alert("hi");
    this.nav.setRoot(MyProfilePage);
  }
}
