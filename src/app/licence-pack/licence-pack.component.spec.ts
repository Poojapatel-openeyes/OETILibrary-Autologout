import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LicencePackComponent } from './licence-pack.component';

describe('LicencePackComponent', () => {
  let component: LicencePackComponent;
  let fixture: ComponentFixture<LicencePackComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LicencePackComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LicencePackComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
