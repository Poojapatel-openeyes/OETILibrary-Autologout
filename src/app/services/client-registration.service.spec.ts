import { TestBed, inject } from '@angular/core/testing';

import { ClientRegistrationService } from './client-registration.service';

describe('ClientRegistrationService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ClientRegistrationService]
    });
  });

  it('should be created', inject([ClientRegistrationService], (service: ClientRegistrationService) => {
    expect(service).toBeTruthy();
  }));
});
