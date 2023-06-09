import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { validarTokenGuard } from './guards/validar-token.guard';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'auth/login',
    pathMatch: 'full'
  },
  {
    path: 'auth',
    loadChildren: () => import('./auth/auth.module').then(m => m.AuthModule)
  },
  {
    path: 'api',
    loadChildren: () => import('./protected/protected.module').then(m => m.ProtectedModule),
    canActivate: [validarTokenGuard]
  },
  {
    path: '',
    loadChildren: () => import('./visitor/visitor.module').then(m => m.VisitorModule)
    // canActivate: [validarTokenGuard]
  },
  {
    path: '**',
    redirectTo: 'auth/login'
  },
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
