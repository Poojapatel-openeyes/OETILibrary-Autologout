import { TestBed, inject } from '@angular/core/testing';

import { UserinvitelistService } from './userinvitelist.service';

describe('UserinvitelistService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserinvitelistService]
    });
  });

  it('should be created', inject([UserinvitelistService], (service: UserinvitelistService) => {
    expect(service).toBeTruthy();
  }));
});
