import { TestBed, inject } from '@angular/core/testing';

import { UserscoreService } from './userscore.service';

describe('UserscoreService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserscoreService]
    });
  });

  it('should be created', inject([UserscoreService], (service: UserscoreService) => {
    expect(service).toBeTruthy();
  }));
});
