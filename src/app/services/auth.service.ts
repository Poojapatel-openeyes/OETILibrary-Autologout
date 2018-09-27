import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { Globals } from '.././globals';
import { JwtHelper } from 'angular2-jwt';
import { Store } from '@ngrx/store';
declare var $,swal: any;


@Injectable()
export class AuthService {

  constructor(private http: Http, private globals: Globals,private router: Router) { }
  
  login(loginEntity){ 
		let jwtHelper = new JwtHelper(); 
	let promise = new Promise((resolve, reject) => {
    this.http.post(this.globals.baseAPIUrl + 'Login/check_login', loginEntity, this.globals.headerpath)
      .toPromise()
      .then( 
        res => { // Success 
			let result = res.json();
			if(result && result.token){
				localStorage.setItem('token',result.token);				
				this.globals.authData = new JwtHelper().decodeToken(result.token);
				//this.store.dispatch(new ApplicationActions.LogIn());
			}
		  resolve(res.json());
        },
        msg => { // Error
			reject(msg.json());
			this.globals.isLoading = false;
        }
      );
	});		
	return promise;
  }
  
  logout(UserId){ 
		let promise = new Promise((resolve, reject) => {
		this.http.get(this.globals.baseAPIUrl + 'Login/logout/'+ UserId, this.globals.headerpath)
			.toPromise()
			.then(
				res => { // Success
					if(this.globals.authData.RoleId==4){
						this.globals.authData = undefined;		
					} else {
						this.globals.authData = '';		
					}
								
					localStorage.removeItem('token');
					let company = localStorage.getItem('company');
					if(company){
						localStorage.removeItem('company');
						window.location.href = '/'+company+'/login';  
					} else {
					window.location.href = '/login';
					}
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
   
  isLoggedIn() {   
	  let jwtHelper = new JwtHelper();
	  let token = localStorage.getItem('token');
	  if(!token) {
		  return false;
		}
		let isExpired = jwtHelper.isTokenExpired(token) ? true : false;
		if(isExpired){
			this.globals.authData = '';	
			localStorage.removeItem('token');
		} 
	  return !isExpired;
	}
	
	db_mode(){  
		let promise = new Promise((resolve, reject) => {
			this.http.get(this.globals.baseAPIUrl + 'Login_user/db_mode', this.globals.headerpath)
				.toPromise()
				.then( 
					res => { // Success 
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

		autologout(UserId){ 
			let promise = new Promise((resolve, reject) => {
			this.http.get(this.globals.baseAPIUrl + 'Login/logout/'+ UserId, this.globals.headerpath)
				.toPromise()
				.then(
					res => { // Success
						if(this.globals.authData.RoleId==4){
							this.globals.authData = undefined;		
						} else {
							this.globals.authData = '';		
						}
									
						localStorage.removeItem('token');
						let company = localStorage.getItem('company');
						if(company){
						
								swal({
									type: 'warning',
									allowOutsideClick: false,
									allowEscapeKey:false,
									title: 'Oops...',
									text: 'Something went wrong!',
									
								}).then((result) => {
									if (result.value) {
										localStorage.removeItem('company');
										window.location.href = '/'+company+'/login'; 
							  }})
								
						} else {
							 swal({
								type: 'warning',
								allowOutsideClick: false,
								allowEscapeKey:false,
								title: 'Oops...',
								text: 'Something went wrong!',
		
								}).then((result) => {
									if (result.value) {
									window.location.href = '/login';
								}})
								
						}
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
