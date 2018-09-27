import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { Globals } from '.././globals';
import { JwtHelper } from 'angular2-jwt';
import { Router } from '@angular/router';
import { Http } from '@angular/http';
@Injectable()
export class EditprofileService {
 constructor( private http: HttpClient,private globals: Globals,private router: Router,private httpf: Http) { }


 editprofile(RegisterEntity)
 {    
	let promise = new Promise((resolve, reject) => {
    this.http.post(this.globals.baseAPIUrl + 'EditProfile/editprofile', RegisterEntity)
      .toPromise()
      .then( 
        res => { // Success 
			let result = res;
			if(result && result['token']){
				localStorage.setItem('token',result['token']);				
				this.globals.authData = new JwtHelper().decodeToken(result['token']);
			}
		  resolve(res);
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

  updateCompany(CompanyEntity)
  { debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'EditProfile/updateCompany', CompanyEntity,{
        reportProgress: true,
        observe: 'events'
    })
      .toPromise()
      .then(
        res => { // Success
          resolve(res);
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
   
  getStateList(CountryId){
	let promise = new Promise((resolve, reject) => {
    this.http.get(this.globals.baseAPIUrl + 'EditProfile/getStateList/' + CountryId)
      .toPromise()
      .then(
        res => { // Success
          resolve(res);
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
    
  getProfileById(userId){ debugger
	let promise = new Promise((resolve, reject) => {
    this.http.get(this.globals.baseAPIUrl + 'EditProfile/getProfileById/' + userId)
      .toPromise()
      .then(
        res => { // Success
          resolve(res);
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

  changepassword(UserId){
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Changepassword/change', UserId)
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
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

    uploadFile(file){
      let promise = new Promise((resolve, reject) => {
        this.http.post(this.globals.baseAPIUrl + 'EditProfile/uploadFile', file)
          .toPromise()
          .then(
            res => { // Success
              resolve(res);
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
