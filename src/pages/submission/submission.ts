import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { SubmissiondetailPage } from '../submission/submissiondetail';
import { InformationPage } from '../information/information';

/**
 * Generated class for the SubmissionPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-submission',
  templateUrl: 'submission.html',
})
export class SubmissionPage {
  submission_tab: String;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
     this.submission_tab = "All";
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SubmissionPage');
  }

  submission_detail(){
    this.navCtrl.push(SubmissiondetailPage);
  }

  give_info(){
    this.navCtrl.push(InformationPage);
  }


}
