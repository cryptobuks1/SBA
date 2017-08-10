import { Component } from '@angular/core';
import { FormBuilder, FormGroup, FormsModule,  Validators } from '@angular/forms';
import { AuthService } from '../../providers/auth-service/auth-service';
import { NavController, NavParams, LoadingController, ToastController } from 'ionic-angular';
import { HomePage } from '../home/home';

import { CustomFormsModule } from 'ng2-validation'

import { PasswordValidation } from '../../validators/password.validator';
/**
 * Generated class for the SignupPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

//@IonicPage()
@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage {

  loading: any;
  regData = { login_email:'', login_password:''};
  data: any;
  regForm: FormGroup;

  constructor(public navCtrl: NavController, public navParams: NavParams, public authService: AuthService, 
    public loadingCtrl: LoadingController, private toastCtrl: ToastController, public formdata: FormBuilder) {
      
      this.regForm = this.formdata.group({
            username: ['', [Validators.required]],
            email: ['', [Validators.required, Validators.email]],
            phone: ['', [Validators.required]],
            password: ['', [Validators.required, Validators.pattern(/^[a-z0-9_-]{6,18}$/)]],
            confirm_password: ['', [Validators.required, Validators.pattern(/^[a-z0-9_-]{6,18}$/)]],
        }, {
            validator: PasswordValidation.MatchPassword // your validation method
        });

  }

  registration() {
    this.showLoader();
    this.authService.register(this.regData).then((result) => {
      this.data = result;
      console.log(this.data.ack);
      if(this.data){ 
        if(this.data.status_code==200){
            this.loading.dismiss();
            alert('Registration successfull..');
            this.navCtrl.setRoot(HomePage);
        }else{
          alert(this.data.ack);
          this.loading.dismiss();
        }
      }else{
        alert(this.data.ack);
        this.loading.dismiss();
      }
    }, (err) => {
      this.loading.dismiss();
      this.presentToast(err);
    });
  }

  showLoader(){
    this.loading = this.loadingCtrl.create({
        content: ''
    });
    this.loading.present();
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 3000,
      position: 'bottom',
      dismissOnPageChange: true
    });

    toast.onDidDismiss(() => {
      console.log('Dismissed toast');
    });

    toast.present();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SignupPage');
  }

  login(){
    this.navCtrl.push(HomePage);
  }
  
}
