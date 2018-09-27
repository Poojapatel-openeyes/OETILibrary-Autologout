import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClientinvitelistComponent } from './clientinvitelist.component';

describe('ClientinvitelistComponent', () => {
  let component: ClientinvitelistComponent;
  let fixture: ComponentFixture<ClientinvitelistComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClientinvitelistComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClientinvitelistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
