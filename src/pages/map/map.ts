import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { CreateprojectPage } from '../information/createproject';
import { InformationPage } from '../information/information';

/**
 * Generated class for the MapPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-map',
  templateUrl: 'map.html',
})
export class MapPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MapPage');
  }
  
    create_project(){
    this.navCtrl.push(CreateprojectPage);
  }

    give_info(){
    this.navCtrl.push(InformationPage);
  }

}
