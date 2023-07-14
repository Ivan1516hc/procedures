import { Component, OnInit } from '@angular/core';
import { AllVisitorService } from '../services/all-visitor.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  
  constructor(private allService: AllVisitorService) {
  }
  requests:any=[];

  ngOnInit(): void {
      this.allService.indexRequestVisitor().subscribe({next:(response)=>{
        this.requests = response.data;
        console.log(this.requests);
      }})
  }
}
