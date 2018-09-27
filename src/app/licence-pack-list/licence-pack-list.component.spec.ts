import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LicencePackListComponent } from './licence-pack-list.component';

describe('LicencePackListComponent', () => {
  let component: LicencePackListComponent;
  let fixture: ComponentFixture<LicencePackListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LicencePackListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LicencePackListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
