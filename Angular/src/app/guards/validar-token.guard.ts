import { inject } from '@angular/core';
import { type CanActivateFn, Router } from '@angular/router';
import { AuthService } from '../auth/services/auth.service';
import { Observable, tap } from 'rxjs';

export function validarTokenGuard(): CanActivateFn | Observable<boolean> {
  const authService = inject(AuthService);
  const router = inject(Router);

  return authService.validarToken()
        .pipe(tap( valid => {
          if(!valid){
            router.navigateByUrl('/auth/login');
          }
      }))
};
