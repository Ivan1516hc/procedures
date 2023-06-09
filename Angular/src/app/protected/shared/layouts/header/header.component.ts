import { Component, OnInit, Inject } from '@angular/core';
import { DOCUMENT } from '@angular/common'; 

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html'
})

export class HeaderComponent {
  constructor(@Inject(DOCUMENT) private document: Document) { }

  ngOnInit(): void {
  }
  sidebarToggle()
  {
    //toggle sidebar function
    this.document.body.classList.toggle('toggle-sidebar');
  }
}
