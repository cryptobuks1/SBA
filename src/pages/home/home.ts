import { Component, ViewChild } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { NavController, LoadingController, ToastController } from 'ionic-angular';
import { HomeService } from '../../app/services/home.service';
import { AuthService } from '../../providers/auth-service/auth-service';
import { SignupPage } from '../signup/signup';
import { WelcomePage } from '../welcome/welcome';
import { ForgotPasswordPage } from '../forgot-password/forgot-password';


@Component({  
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  loading: any;
  loginData = { login_email:'', login_password:''};
  data: any;
  user_detail:{};
  myForm: FormGroup;

  constructor(public navCtrl: NavController, public authService: AuthService, 
    public loadingCtrl: LoadingController, private toastCtrl: ToastController, public formdata: FormBuilder) {
        
      this.myForm = this.formdata.group({
            email: ['', [Validators.required, Validators.email]],
            password: ['', [Validators.required,  Validators.pattern(/^[a-z0-9_-]{6,18}$/)]],
      });
      localStorage.removeItem("user_detail");
      localStorage.removeItem("id");
      localStorage.removeItem("username");
      localStorage.removeItem("token_key");
      localStorage.removeItem("referral_code");
    }
  
  authenticate() {
    this.showLoader();
    this.authService.login(this.loginData).then((result) => {
      this.data = result;
      if(this.data){ 
        if(this.data.status_code==200){
            this.loading.dismiss();
            console.log(this.data.response.detail);
            localStorage.setItem('id', this.data.response.detail.id);
            localStorage.setItem('username', this.data.response.detail.username);
            localStorage.setItem('token', this.data.response.detail.token_key);
            localStorage.setItem('referral_code', this.data.response.detail.referral_code);
            this.navCtrl.setRoot(WelcomePage);
        }else{
          this.loading.dismiss();
          alert(this.data.ack);
        }
      }else{
        this.loading.dismiss();
        alert(this.data.ack);
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

  signup_page() {
      this.navCtrl.push(SignupPage);
  }

  forgot_password(){
    this.navCtrl.push(ForgotPasswordPage);
    
  }


}
