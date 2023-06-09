import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

// import Swal from "sweetalert2";

import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
})
export class LoginComponent  {

  logoSrc= 'assets/images/Logo_DIF.png';

  miFormulario:FormGroup = this.fb.group({
    email:['',[Validators.required,Validators.email]],
    password:['',[Validators.required,Validators.minLength(6)]],
  });

  constructor(private fb:FormBuilder,
              private router:Router, private authService: AuthService) { }

  login(){
    const {email, password}=this.miFormulario.value;
    this.authService.login(email, password).
    subscribe(response => {
      if(response.ok === true){
        const code=parseInt(localStorage.getItem('code')!);
        localStorage.removeItem('code')
        if(code==1){
          this.router.navigateByUrl('/dashboard')
        }if(code==2){
          this.router.navigateByUrl('/api/dashboard')
        }
      }else{
        // Swal.fire('Error',response.error.error,'error');
      }
    })
  }
}
