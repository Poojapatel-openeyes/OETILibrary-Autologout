import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { JwtHelper } from 'angular2-jwt';
import { Router } from '@angular/router';
@Injectable()
export class UserRegistrationService {

  constructor( private http: Http,private globals: Globals,private router: Router) { }

  updateUser(UserRegisterEntity)
  { debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'UserRegister/updateUser', UserRegisterEntity, this.globals.headerpath)
        .toPromise()
        .then( 
          res => { // Success 
        let result = res.json();
        if(result && result.token){
          localStorage.setItem('token',result.token);				
          this.globals.authData = new JwtHelper().decodeToken(result.token);
        }
        resolve(res.json());
          },
          msg => { // Error
        reject(msg.json());
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
          }
        );
    });		
    return promise;
  }
  getAllData(id)
  { 
	let promise = new Promise((resolve, reject) => {
    this.http.get(this.globals.baseAPIUrl + 'UserRegister/getAllData/'+id , this.globals.headerpath)
      .toPromise()
      .then(
        res => { // Success
          resolve(res.json());
        },
        msg => { // Error
      reject(msg);
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
        }
      );
	});		
	return promise;
  } 
  
}
