import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'guarderia',
    loadChildren: () => import('./creche/creche.module').then(m => m.CrecheModule),
  },
  {
    path: 'autismo',
    loadChildren: () => import('./autism/autism.module').then(m => m.AutismModule),
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProtectedRoutingModule { }
