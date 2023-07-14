import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { validarTokenGuard } from '../guards/validar-token.guard';

const routes: Routes = [
  {
    path: 'guarderia',
    loadChildren: () => import('./creche/creche.module').then(m => m.CrecheModule),
    canActivate: [validarTokenGuard]
  },
  {
    path: 'autismo',
    loadChildren: () => import('./autism/autism.module').then(m => m.AutismModule),
    canActivate: [validarTokenGuard]
  },
  {
    path: 'home',
    loadChildren: () => import('./homepage/homepage.module').then(m => m.HomepageModule),
  },
  {
    path: 'dashboard',
    loadChildren: () => import('./dashboard/dashboard.module').then(m => m.DashboardModule),
    canActivate: [validarTokenGuard]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class VisitorRoutingModule { }
