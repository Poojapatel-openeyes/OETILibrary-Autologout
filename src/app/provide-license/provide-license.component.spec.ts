import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProvideLicenseComponent } from './provide-license.component';

describe('ProvideLicenseComponent', () => {
  let component: ProvideLicenseComponent;
  let fixture: ComponentFixture<ProvideLicenseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProvideLicenseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProvideLicenseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
