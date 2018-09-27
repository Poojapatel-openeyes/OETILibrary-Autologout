import { TestBed, inject } from '@angular/core/testing';

import { ClientInviteService } from './client-invite.service';

describe('ClientInviteService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ClientInviteService]
    });
  });

  it('should be created', inject([ClientInviteService], (service: ClientInviteService) => {
    expect(service).toBeTruthy();
  }));
});
