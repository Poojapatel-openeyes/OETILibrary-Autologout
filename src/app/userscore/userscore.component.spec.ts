import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UserscoreComponent } from './userscore.component';

describe('UserscoreComponent', () => {
  let component: UserscoreComponent;
  let fixture: ComponentFixture<UserscoreComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UserscoreComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UserscoreComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
