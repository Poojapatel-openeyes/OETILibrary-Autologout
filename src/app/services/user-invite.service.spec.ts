import { TestBed, inject } from '@angular/core/testing';

import { UserInviteService } from './user-invite.service';

describe('UserInviteService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserInviteService]
    });
  });

  it('should be created', inject([UserInviteService], (service: UserInviteService) => {
    expect(service).toBeTruthy();
  }));
});
