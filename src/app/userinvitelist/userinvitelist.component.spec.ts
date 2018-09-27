import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UserinvitelistComponent } from './userinvitelist.component';

describe('UserinvitelistComponent', () => {
  let component: UserinvitelistComponent;
  let fixture: ComponentFixture<UserinvitelistComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UserinvitelistComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UserinvitelistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
