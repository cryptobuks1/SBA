import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the ConsultantPage page.
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-consultant',
  templateUrl: 'consultant.html',
})
export class ConsultantPage {
  cons_tab: String;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.cons_tab = "BusinessCard";
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ConsultantPage');
  }

}
