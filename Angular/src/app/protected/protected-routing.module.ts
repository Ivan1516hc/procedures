import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'guarderia',
    loadChildren: () => import('./creche/creche.module').then(m => m.CrecheModule),
    // canActivate: [ValidarTokenAdminGuard],
    // canLoad: [ValidarTokenAdminGuard]
  },
  {
    path: 'autismo',
    loadChildren: () => import('./autism/autism.module').then(m => m.AutismModule),
    // canActivate: [ValidarTokenGuard],
    // canLoad: [ValidarTokenGuard]
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProtectedRoutingModule { }
