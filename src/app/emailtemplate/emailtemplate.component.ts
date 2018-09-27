import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { EmailtemplateService } from '../services/emailtemplate.service';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
declare var $,swal: any;
declare var CKEDITOR: any;
import { CommonService } from '../services/common.service';
declare function myInput(): any;

@Component({
	selector: 'app-emailtemplate',
	templateUrl: './emailtemplate.component.html',
	styleUrls: ['./emailtemplate.component.css']
})
export class EmailtemplateComponent implements OnInit {
	emailEntity;
	submitted;
	btn_disable;
	header;
	des_valid;
	roleList;
	placeholderList;
	abcform;
	tokenList;

	constructor(private http: Http, public globals: Globals, private router: Router, private EmailtemplateService: EmailtemplateService,
		private CommonService: CommonService, private route: ActivatedRoute) { }

	ngOnInit() {
		this.globals.pageTitle = '- Email Template';
		$("footer").addClass("footer_admin");
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
		} else {
			$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
		}
		this.globals.isLoading = true;
		$("body").tooltip({
			selector: "[data-toggle='tooltip']"
		});
		this.globals.isLoading = true;
		if (this.globals.authData.RoleId == 5) {
			this.default();
		} else {
			this.CommonService.get_permissiondata({ 'RoleId': this.globals.authData.RoleId, 'screen': 'Email Template' })
				.then((data) => {
					if (data['AddEdit'] == 1) {
						this.default();
					} else {
						this.router.navigate(['/pagenotfound']);
					}
				},
					(error) => {
						this.globals.isLoading = false;
						this.router.navigate(['/pagenotfound']);
					});
		}
	}

	default() {
		this.globals.msgflag = false;
		this.des_valid = false;
		this.emailEntity = {};
		CKEDITOR.replace( 'EmailBody', {
			height: '200',
			resize_enabled : 'false',
			resize_maxHeight : '200',
			resize_maxWidth : '948',
			resize_minHeight: '200',
			resize_minWidth: '948', 
			 extraAllowedContent: 'span;ul;li;table;td;style;*[id];*(*);*{*}'
			//extraAllowedContent: 'style;*[id,rel](*){*}
	 });
		let id = this.route.snapshot.paramMap.get('id');
		this.EmailtemplateService.getDefaultList()
			.then((data) => {
				this.roleList = data['role'];
				this.placeholderList = data['placeholder'];
				this.tokenList = data['token'];
				this.globals.isLoading = false;
			},
				(error) => {
					this.globals.isLoading = false;
					this.router.navigate(['/admin/pagenotfound']);
				});
		if (id) {
			this.header = 'Edit';
			this.EmailtemplateService.getById(id)
				.then((data) => {
					if (data != "") {
						this.emailEntity = data;
						if (this.emailEntity.Cc == 0) {
							this.emailEntity.Cc = "";
						}
						if (this.emailEntity.Bcc == 0) {
							this.emailEntity.Bcc = "";
						}
						CKEDITOR.instances.EmailBody.setData(this.emailEntity.EmailBody);
						this.globals.isLoading = false;
						setTimeout(function(){
							myInput();
					  },100); 
					} else {
						this.router.navigate(['/dashboard']);
					}

				},
					(error) => {
						this.globals.isLoading = false;
						this.router.navigate(['/pagenotfound']);
					});
		} else {
			this.header = 'Add';
			this.emailEntity = {};
			this.emailEntity.EmailId = 0;
			this.emailEntity.TokenId = '';
			this.emailEntity.To = '';
			this.emailEntity.Cc = '';
			this.emailEntity.Bcc = '';
			this.emailEntity.IsActive = '1';
			this.globals.isLoading = false;
			myInput();
		}

		CKEDITOR.on('instanceReady', function () {
			CKEDITOR.document.getById('contactList').on('dragstart', function (evt) {
				var target = evt.data.getTarget().getAscendant('div', true);
				CKEDITOR.plugins.clipboard.initDragDataTransfer(evt);
				var dataTransfer = evt.data.dataTransfer;
				dataTransfer.setData('text/html', '{' + target.getText() + '}');
			});
		});
		// CKEDITOR.on('instanceReady', function () {
		// 	CKEDITOR.document.getById('contactList').on('dragstart', function (evt) {
		// 		var target = evt.data.getTarget().getAscendant('div', true);
		// 		CKEDITOR.plugins.clipboard.initDragDataTransfer(evt);
		// 		var dataTransfer = evt.data.dataTransfer;
		// 		dataTransfer.setData('text/html', '{' + target.getText() + '}');
		// 	});
		// });
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".emailtemplate").parent().addClass("in");
			$(".email").addClass("active"); 
			$(".emailtemplate").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}		       		
		},500);

	}

	addEmailTemplate(EmailForm) {
		this.emailEntity.EmailBody = CKEDITOR.instances.EmailBody.getData();
		if (this.emailEntity.EmailBody != "") {
			this.des_valid = false;
		} else {
			this.des_valid = true;
		}
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.emailEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.emailEntity.CreatedBy = this.globals.authData.UserId;
			this.emailEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if (EmailForm.valid && this.des_valid == false) {
			this.btn_disable = true;
			this.emailEntity.check = 0;
			this.EmailtemplateService.add(this.emailEntity)
				.then((data) => {
					if (data == 'sure') {
						this.btn_disable = false;
						this.submitted = false;
						this.abcform = EmailForm;
						//$('#Sure_Modal').modal('show');
						swal({
							title: 'Are you sure?',
							text: "You want to update this Email Template?",
							type: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes, update it!'
						}).then((result) => {
							if (result.value) {

								this.emailEntity.check = 1;
								let id = this.route.snapshot.paramMap.get('id');
								this.EmailtemplateService.add(this.emailEntity)
									.then((data) => {
							
										this.btn_disable = false;
										this.submitted = false;
										this.emailEntity = {};
									
										if (id) {
											
											swal({
												position: 'top-end',
												type: 'success',
												title: 'Email Template updated successfully',
												showConfirmButton: false,
												timer: 1500
											})
										} else {
									
											swal({
												position: 'top-end',
												type: 'success',
												title: 'Email Template added successfully',
												showConfirmButton: false,
												timer: 1500
											})
										}
										this.router.navigate(['/emailtemplate/list']);
						
									},
										(error) => {
											this.btn_disable = false;
											this.submitted = false;
											this.globals.isLoading = false;
											this.router.navigate(['/pagenotfound']);
										});



						}})
					} else {
						this.btn_disable = false;
						this.submitted = false;
						this.emailEntity = {};
						EmailForm.form.markAsPristine();
						if (id) {
							
							swal({
								position: 'top-end',
								type: 'success',
								title: 'Email Template updated successfully',
								showConfirmButton: false,
								timer: 1500
							})
						} else {
				
							swal({
								position: 'top-end',
								type: 'success',
								title: 'Email Template added successfully',
								showConfirmButton: false,
								timer: 1500
							})
						}
						this.router.navigate(['/emailtemplate/list']);
					}
				},
					(error) => {
						this.btn_disable = false;
						this.submitted = false;
						this.globals.isLoading = false;
						this.router.navigate(['/pagenotfound']);
					});
		}
	}

	clearForm(EmailForm) {
		this.emailEntity = {};
		this.emailEntity.EmailId = 0;
		this.emailEntity.IsActive = '1';
		this.submitted = false;
		this.des_valid = false;
		this.emailEntity.TokenId = '';
		this.emailEntity.To = '';
		this.emailEntity.Cc = '';
		this.emailEntity.Bcc = '';
		//CKEDITOR.instances.EmailBody.setData('');
		EmailForm.form.markAsPristine();
	}

	addConfirm(abcform) {

		this.emailEntity.check = 1;
		let id = this.route.snapshot.paramMap.get('id');
		this.EmailtemplateService.add(this.emailEntity)
			.then((data) => {
				$('#Sure_Modal').modal('hide');
				this.btn_disable = false;
				this.submitted = false;
				this.emailEntity = {};
				abcform.form.markAsPristine();
				if (id) {
					
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Email Template updated successfully',
						showConfirmButton: false,
						timer: 1500
					})
				} else {
			
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Email Template added successfully',
						showConfirmButton: false,
						timer: 1500
					})
				}
				this.router.navigate(['/emailtemplate/list']);

			},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
	}

}

