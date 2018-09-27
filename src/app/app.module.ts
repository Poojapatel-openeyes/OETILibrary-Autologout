import { BrowserModule } from '@angular/platform-browser';
import { Component,NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';
import { HttpInterceptorClassService } from './http-interceptor-class.service';
import { StoreModule } from '@ngrx/store';
import { EffectsModule } from '@ngrx/effects';


import { AuthGuard } from './services/auth-guard.service';
import { AuthService } from './services/auth.service';
import { CommonService } from './services/common.service';
import { DashboardService } from './services/dashboard.service';
import { RegisterService } from './services/register.service';
import { ChangepasswordService } from './services/changepassword.service';
import { ForgotpasswordService } from './services/forgotpassword.service';
import { ResetpasswordService } from './services/resetpassword.service';
import { EditprofileService } from './services/editprofile.service';
import { CategoryService } from './services/category.service';
import { SubCategoryService } from './services/sub-category.service';
import { AnswerService } from './services/answer.service';
import { CountryService } from './services/country.service';
import { StateService } from './services/state.service';
import { QuestionService } from './services/question.service';
import { AuditlogService } from './services/auditlog.service';
import { PlaceholderService } from './services/placeholder.service';
import { EmailtemplateService } from './services/emailtemplate.service';
import { RolepermissionService } from './services/rolepermission.service';
import { ClientInviteService } from './services/client-invite.service';
import { SettingsService } from './services/settings.service';
import { ClientRegistrationService } from './services/client-registration.service';
import { DiscountTypeService } from './services/discount-type.service';
import { LicenceTypeService } from './services/licence-type.service';
import { DiscountService } from './services/discount.service';
import { LicencePackService } from './services/licence-pack.service';
import { UserInviteService } from './services/user-invite.service';
import { UserRegistrationService } from './services/user-registration.service';
import { UserinvitelistService } from './services/userinvitelist.service';
import { ClientinvitelistService } from './services/clientinvitelist.service';
import { FeedbackService } from './services/feedback.service';
import { UserResultService } from './services/user-result.service';
import { ContactusService } from './services/contactus.service';
import { PurchaseLicensepackService } from './services/purchase-licensepack.service';
import { MyLicensepackService } from './services/my-licensepack.service';
import { PurchaseReportService } from './services/purchase-report.service';
import { UserscoreService } from './services/userscore.service';
import { ProvideLicenseService } from './services/provide-license.service';
import { FeedbackUserreportService } from './services/feedback-userreport.service';


import { Globals } from './globals';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { ErrorComponent } from './error/error.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { LeftMenuComponent } from './left-menu/left-menu.component';
import { LoginComponent } from './login/login.component';
import { ForgotpasswordComponent } from './forgotpassword/forgotpassword.component';
import { ResetpasswordComponent } from './resetpassword/resetpassword.component';
import { EditprofileComponent } from './editprofile/editprofile.component';
import { ChangepasswordComponent } from './changepassword/changepassword.component';
import { CategoryComponent } from './category/category.component';
import { SubCategoryComponent } from './sub-category/sub-category.component';
import { CategoryListComponent } from './category-list/category-list.component';
import { SubCategoryListComponent } from './sub-category-list/sub-category-list.component';
import { AnswerComponent } from './answer/answer.component';
import { AnswerListComponent } from './answer-list/answer-list.component';
import { CountryComponent } from './country/country.component';
import { CountrylistComponent } from './countrylist/countrylist.component';
import { StateComponent } from './state/state.component';
import { StatelistComponent } from './statelist/statelist.component';
import { QuestionComponent } from './question/question.component';
import { QuestionListComponent } from './question-list/question-list.component';
import { ActivityLogComponent } from './activity-log/activity-log.component';
import { LoginLogComponent } from './login-log/login-log.component';
import { EmailLogComponent } from './email-log/email-log.component';
import { PlaceholderComponent } from './placeholder/placeholder.component';
import { PlaceholderListComponent } from './placeholder-list/placeholder-list.component';
import { EmailtemplateComponent } from './emailtemplate/emailtemplate.component';
import { EmailtemplateListComponent } from './emailtemplate-list/emailtemplate-list.component';
import { RolepermissionComponent } from './rolepermission/rolepermission.component';
import { ClientInviteComponent } from './client-invite/client-invite.component';
import { ClientRegistrationComponent } from './client-registration/client-registration.component';
import { SettingsComponent } from './settings/settings.component';
import { ClientSignUpComponent } from './client-sign-up/client-sign-up.component';
import { DiscountTypeComponent } from './discount-type/discount-type.component';
import { DiscountTypeListComponent } from './discount-type-list/discount-type-list.component';
import { LicenseTypeComponent } from './license-type/license-type.component';
import { LicenseTypeListComponent } from './license-type-list/license-type-list.component';
import { DiscountComponent } from './discount/discount.component';
import { DiscountListComponent } from './discount-list/discount-list.component';
import { LicencePackComponent } from './licence-pack/licence-pack.component';
import { LicencePackListComponent } from './licence-pack-list/licence-pack-list.component';
import { UserInviteComponent } from './user-invite/user-invite.component';
import { UserRegistrationComponent } from './user-registration/user-registration.component';
import { ClientinvitelistComponent } from './clientinvitelist/clientinvitelist.component';
import { UserinvitelistComponent } from './userinvitelist/userinvitelist.component';
import { FeedbackComponent } from './feedback/feedback.component';
import { UserWelcomeComponent } from './user-welcome/user-welcome.component';
import { UserResultComponent } from './user-result/user-result.component';
import { ContactusComponent } from './contactus/contactus.component';
import { InquiryListComponent } from './inquiry-list/inquiry-list.component';
import { ClientDashboardComponent } from './client-dashboard/client-dashboard.component';
import { PurchaseLicensepackComponent } from './purchase-licensepack/purchase-licensepack.component';
import { MyLicensepackComponent } from './my-licensepack/my-licensepack.component';
import { PurchaseReportComponent } from './purchase-report/purchase-report.component';
import { UserscoreComponent } from './userscore/userscore.component';
import { ProvideLicenseComponent } from './provide-license/provide-license.component';
import { FeedbackUserreportComponent } from './feedback-userreport/feedback-userreport.component';
import { FooterLoginComponent } from './footer-login/footer-login.component';
import { IncompleteFeedbackReportComponent } from './incomplete-feedback-report/incomplete-feedback-report.component';
import { ErrorLogComponent } from './error-log/error-log.component';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    ErrorComponent,
    DashboardComponent,
    LeftMenuComponent,
    LoginComponent,
    ForgotpasswordComponent,
    ResetpasswordComponent,
    EditprofileComponent,
    ChangepasswordComponent,
    CategoryComponent,
    SubCategoryComponent,
    CategoryListComponent,
    SubCategoryListComponent,
    AnswerComponent,
    AnswerListComponent,
    CountryComponent,
    CountrylistComponent,
    StateComponent,
    StatelistComponent,
    QuestionComponent,
    QuestionListComponent,
    ActivityLogComponent,
    LoginLogComponent,
    EmailLogComponent,
    PlaceholderComponent,
    PlaceholderListComponent,
    EmailtemplateComponent,
    EmailtemplateListComponent,
    RolepermissionComponent,
    ClientInviteComponent,
    ClientRegistrationComponent,
    SettingsComponent,
    ClientSignUpComponent,
    DiscountTypeComponent,
    DiscountTypeListComponent,
    LicenseTypeComponent,
    LicenseTypeListComponent,
    DiscountComponent,
    DiscountListComponent,
    LicencePackComponent,
    LicencePackListComponent,
    UserInviteComponent,
    UserRegistrationComponent,
    ClientinvitelistComponent,
    UserinvitelistComponent,
    FeedbackComponent,
    UserWelcomeComponent,
    UserResultComponent,
    ContactusComponent,
    InquiryListComponent,
    ClientDashboardComponent,
    PurchaseLicensepackComponent,
    MyLicensepackComponent,
    PurchaseReportComponent,
    UserscoreComponent,
    ProvideLicenseComponent,
    FeedbackUserreportComponent,
    FooterLoginComponent,
    IncompleteFeedbackReportComponent,
    ErrorLogComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot([        
        { path: 'login', component: LoginComponent,canActivate : [AuthGuard] },  
				{ path: 'resetpassword/:id', component: ResetpasswordComponent,canActivate : [AuthGuard] },
        { path: 'forgotpassword', component: ForgotpasswordComponent,canActivate : [AuthGuard] },
        { path: 'dashboard', component: DashboardComponent,canActivate : [AuthGuard] },
        { path: 'client-dashboard', component: ClientDashboardComponent,canActivate : [AuthGuard] },
        { path: 'editprofile', component: EditprofileComponent,canActivate : [AuthGuard] },
        { path: 'changepassword', component: ChangepasswordComponent,canActivate : [AuthGuard] },
        { path: 'pagenotfound', component : ErrorComponent, canActivate : [AuthGuard] },
        { path : 'category/add', component : CategoryComponent,canActivate : [AuthGuard] },
        { path : 'category/list', component : CategoryListComponent,canActivate : [AuthGuard] },
        { path : 'category/edit/:id', component : CategoryComponent,canActivate : [AuthGuard] },
        { path : 'sub-category/add', component : SubCategoryComponent,canActivate : [AuthGuard] },
        { path : 'sub-category/list', component : SubCategoryListComponent,canActivate : [AuthGuard] },
        { path : 'sub-category/edit/:id', component : SubCategoryComponent,canActivate : [AuthGuard] },
        //{ path : 'answer/add', component : AnswerComponent,canActivate : [AuthGuard] },
        { path : 'answer/list', component : AnswerListComponent,canActivate : [AuthGuard] },
        { path : 'answer/edit/:id', component : AnswerComponent,canActivate : [AuthGuard] },
        { path : 'country/add', component : CountryComponent,canActivate : [AuthGuard] },
        { path : 'country/list', component : CountrylistComponent,canActivate : [AuthGuard] },
        { path : 'country/edit/:id', component : CountryComponent,canActivate : [AuthGuard] },
        { path : 'state/add', component : StateComponent,canActivate : [AuthGuard] },
        { path : 'state/list', component : StatelistComponent,canActivate : [AuthGuard] },
        { path : 'state/edit/:id', component : StateComponent,canActivate : [AuthGuard] },
        { path : 'question/add', component : QuestionComponent,canActivate : [AuthGuard] },
        { path : 'question/list', component : QuestionListComponent,canActivate : [AuthGuard] },
        { path : 'question/edit/:id', component : QuestionComponent,canActivate : [AuthGuard] },
        { path : 'email-log', component : EmailLogComponent,canActivate : [AuthGuard] },
        { path : 'login-log', component : LoginLogComponent,canActivate : [AuthGuard] },
        { path : 'activity-log',component : ActivityLogComponent,canActivate : [AuthGuard] },
        { path : 'placeholder/add', component : PlaceholderComponent,canActivate : [AuthGuard] },
        { path : 'placeholder/edit/:id', component : PlaceholderComponent,canActivate : [AuthGuard] },
        { path : 'placeholder/list', component : PlaceholderListComponent,canActivate : [AuthGuard] },
        { path : 'emailtemplate/add', component : EmailtemplateComponent,canActivate : [AuthGuard] },
        { path : 'emailtemplate/edit/:id', component : EmailtemplateComponent,canActivate : [AuthGuard] },
        { path : 'emailtemplate/list', component : EmailtemplateListComponent,canActivate : [AuthGuard] },
        { path : 'rolepermission', component : RolepermissionComponent,canActivate : [AuthGuard] },
        { path : 'client-invite', component : ClientInviteComponent,canActivate : [AuthGuard] },
        { path : 'client-registration/:id', component : ClientRegistrationComponent,canActivate : [AuthGuard] },
        { path : 'client-sign-up', component : ClientSignUpComponent,canActivate : [AuthGuard] },
        { path : 'settings', component : SettingsComponent,canActivate : [AuthGuard] },
        //{ path : 'discount-type/add', component : DiscountTypeComponent,canActivate : [AuthGuard] },
        { path : 'discount-type/list', component : DiscountTypeListComponent,canActivate : [AuthGuard] },
        { path : 'discount-type/edit/:id', component : DiscountTypeComponent,canActivate : [AuthGuard] },
        { path : 'license-type/add', component : LicenseTypeComponent,canActivate : [AuthGuard] },
        { path : 'license-type/list', component : LicenseTypeListComponent,canActivate : [AuthGuard] },
        { path : 'license-type/edit/:id', component : LicenseTypeComponent,canActivate : [AuthGuard] },
        { path : 'discount/add', component : DiscountComponent,canActivate : [AuthGuard] },
        { path : 'discount/list', component : DiscountListComponent,canActivate : [AuthGuard] },
        { path : 'discount/edit/:id', component : DiscountComponent,canActivate : [AuthGuard] },
        { path : 'license-pack/add', component : LicencePackComponent,canActivate : [AuthGuard] },
        { path : 'license-pack/list', component : LicencePackListComponent,canActivate : [AuthGuard] },
        { path : 'license-pack/edit/:id', component : LicencePackComponent,canActivate : [AuthGuard] },
        { path : 'user-invite', component : UserInviteComponent,canActivate : [AuthGuard] },
        { path : 'user-registration/:id', component : UserRegistrationComponent,canActivate : [AuthGuard] },
        { path : 'user-invitelist', component : UserinvitelistComponent,canActivate : [AuthGuard] },
        { path : 'client-invitelist', component : ClientinvitelistComponent,canActivate : [AuthGuard] },
        //{ path : 'user/welcome', component : UserWelcomeComponent,canActivate : [AuthGuard] },
        { path : 'user/feedback', component : FeedbackComponent,canActivate : [AuthGuard] },
        { path : 'user/result', component : UserResultComponent,canActivate : [AuthGuard] },
        { path : 'contactus', component : ContactusComponent,canActivate : [AuthGuard] },
        { path : 'inquiry/list', component : InquiryListComponent,canActivate : [AuthGuard] },
        { path : 'purchase-licensepack', component : PurchaseLicensepackComponent,canActivate : [AuthGuard] },
        { path : 'my-licensepack', component : MyLicensepackComponent,canActivate : [AuthGuard] },
        { path : ':name/login', component : LoginComponent,canActivate : [AuthGuard] },
        { path : ':name/forgotpassword', component : ForgotpasswordComponent,canActivate : [AuthGuard] },
        { path : ':name/resetpassword/:id', component : ResetpasswordComponent,canActivate : [AuthGuard] },
        { path : ':name/client-registration/:id', component : ClientRegistrationComponent,canActivate : [AuthGuard] },
        { path : ':name/user-registration/:id', component : UserRegistrationComponent,canActivate : [AuthGuard] },
        { path : 'purchase-report', component : PurchaseReportComponent,canActivate : [AuthGuard] },
        //{ path : 'user-feedback-score',component : UserscoreComponent,canActivate : [AuthGuard] },
        { path : 'provide-license', component : ProvideLicenseComponent,canActivate : [AuthGuard] },
        { path : 'user-feedback-report', component : FeedbackUserreportComponent,canActivate : [AuthGuard] },
        { path : 'incomplete-feedback-report', component : IncompleteFeedbackReportComponent,canActivate : [AuthGuard] },
        { path : 'error-log', component : ErrorLogComponent,canActivate : [AuthGuard] },
        { path: '', redirectTo: 'dashboard', pathMatch:'full'},
				{ path: '**', redirectTo : 'dashboard' }
    ])
  ],
  providers: [Globals,AuthService,AuthGuard,AnswerService,CategoryService,ChangepasswordService,CommonService,
    CountryService,DashboardService,EditprofileService,ForgotpasswordService,RegisterService,ResetpasswordService,
    StateService,SubCategoryService,QuestionService,AuditlogService,PlaceholderService,EmailtemplateService,
    RolepermissionService,ClientInviteService,SettingsService,ClientRegistrationService,DiscountTypeService,
    DiscountService,LicencePackService,LicenceTypeService,UserInviteService,UserRegistrationService,
    ClientinvitelistService,UserinvitelistService,FeedbackService,UserResultService,ContactusService,
    PurchaseLicensepackService,MyLicensepackService,PurchaseReportService,UserscoreService,ProvideLicenseService,
    FeedbackUserreportService,{
    
    provide: HTTP_INTERCEPTORS,
      useClass: HttpInterceptorClassService,
      multi: true
    }],
  bootstrap: [AppComponent]
})
export class AppModule { }
