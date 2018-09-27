import { Injectable } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import {HttpClient} from "@angular/common/http";

@Injectable()
export class ChangepasswordService {

  constructor( private http: HttpClient,private globals: Globals,private router: Router) { }
  
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

}
