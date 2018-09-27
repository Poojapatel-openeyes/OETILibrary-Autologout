import { TestBed, inject } from '@angular/core/testing';

import { ClientinvitelistService } from './clientinvitelist.service';

describe('ClientinvitelistService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ClientinvitelistService]
    });
  });

  it('should be created', inject([ClientinvitelistService], (service: ClientinvitelistService) => {
    expect(service).toBeTruthy();
  }));
});
