import { TestBed, inject } from '@angular/core/testing';

import { UserResultService } from './user-result.service';

describe('UserResultService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserResultService]
    });
  });

  it('should be created', inject([UserResultService], (service: UserResultService) => {
    expect(service).toBeTruthy();
  }));
});
