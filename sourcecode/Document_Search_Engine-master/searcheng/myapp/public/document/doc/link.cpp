#include<stdio.h>
#include<stdlib.h>
//#include<conio.h>
#include<iostream>
void alott(struct freenode **frhead,struct freenode *prev,struct freenode *current,struct node **alloted_head,int id);
//int free_mem(struct node **alot_head,struct freenode **free_node,int pr_id);
void display_alott(struct node *dis_head);
void display_free(struct freenode *dis_free);


using namespace std;

struct node
{
    int ea;
    int sa;
    int pid;
    struct node* link;
};

struct freenode
{
    int ea;
    int sa;
    struct freenode* freelink;
};


main()
{
	int lop=1,cas;
	int p_id,end_a,start_a,x,choice,space,m=0,n,allot_cas,oldspace,block=0;
    
	struct freenode *freehead=NULL,*freetemp,*freetemp1,*freecheck,*freeprev;
        
	struct node *head=NULL,*temp2;
    
		        
	while(lop!=0)
	{
		cout<<"\n\n1.to create memory block"<<endl;
		cout<<"2.to allot memory block"<<endl;
		//cout<<"3.to free memory block"<<endl;
		cout<<"4.to display free memory block"<<endl;
		cout<<"5.to display alotted memory block"<<endl;
		cin>>cas;
		
	switch(cas)
		{
		
	case 1:
		{ 
		while(1)
		{
		cout<<"start adrs for block no. "<<(m+1);
		cout<<":";

		cin>>start_a;
		
		cout<<"end adrs for block no."<<(m+1);
		cout<<":";

		cin>>end_a;		
		freetemp1=freehead;

		if(freetemp1==NULL)
		{
			freehead=(struct freenode*)malloc(sizeof(struct freenode));
			freehead->sa=start_a;
			freehead->ea=end_a;
			freehead->freelink=NULL;
		
		}
		
		else
		{
			while(freetemp1!=NULL)
			{
				if(freetemp1->freelink==NULL)
				break;
				
				freetemp1=freetemp1->freelink;
			}
			

			freetemp=(struct freenode*)malloc(sizeof(struct freenode));
        		freetemp->sa=start_a;
			freetemp->ea=end_a;
			freetemp->freelink=NULL;
			
			freetemp1->freelink=freetemp;
			
		}
		m++;
		
		cout<<"to exit press 0";
		cin>>choice;
		
		if(choice==0)
		break;
		}   
	
		}break;
	

	
	
	
	 case 2:
		{
			cout<<"1.for first fit"<<endl;
			cout<<"2.for best fit"<<endl;
			cout<<"3.for worst fit"<<endl;
			cin>>allot_cas;

			cout<<"\n Enter PROCESS ID:";
			cin>>p_id;	
	   
	    		cout<<"\n ENTER MEMORY SPACE:";
	    		cin>>space;

	        
			struct freenode *bestfit=NULL,*bestprev;
			struct freenode *worstfit=NULL,*worstprev;
		
			switch(allot_cas)
			{
			case 1://FIRST FIT
			{
				freeprev=NULL;
	   			freecheck=freehead;
	   			n=0;

		   		if(m==0)
		   		cout<<"NO MEMORY BOCK AVAIABLE:"<<endl<<endl;
	   			
				while(m>0)//no of freespace
	   			{
		   			start_a=freecheck->sa;
					end_a=freecheck->ea;
					
					if((end_a-start_a)>=space)
					{
					n++;	
					break;
					}
					freeprev=freecheck;
					freecheck=freecheck->freelink;
							
					if(freecheck==NULL)
					break;
				}

			   
			   if(n>0)
			   {
			   	cout<<"space alloting:";
			   	cout<<freecheck->sa;
			   	cout<<" between ";
			   	cout<<freecheck->ea<<endl;
			   
			   	alott(&freehead,freeprev,freecheck,&head,p_id);
			  	m--;

			   }
					   
			   else
			   cout<<"no suitable space available"<<endl; 
			   
			   
				}break;

				
			case 2://BEST-FIT
			{
				
				int oldspace;
				freeprev=NULL;
		   		freecheck=freehead;
		   		bestprev=NULL;
		   		n=0;
		   		if(m==0)
		   		cout<<"NO MEMORY BOCK AVAIABLE:"<<endl<<endl;
				while(m>0)
				{
				
		   		start_a=freecheck->sa;
				end_a=freecheck->ea;
			
				if((end_a-start_a)>=space)
				{
					if(bestfit==NULL)
					{
					bestprev=freeprev;	
					bestfit=freecheck;
					oldspace=(end_a-start_a);
					}
					else
					{
						if(oldspace>=(end_a-start_a))
						{
						bestprev=freeprev;
						bestfit=freecheck;
						oldspace=(end_a-start_a);
					}
					
					}
					n=1;
					}
					freeprev=freecheck;
					freecheck=freecheck->freelink;
			
					if(freecheck==NULL)
					break;
			
			
					}//WHILE
			
					if(n==0)
					cout<<"no such space available"<<endl;
					
					else
					{
						cout<<"\nALOTTED STARTING ADD.:"<<bestfit->sa<<endl;
						cout<<"ALOTTED END ADD::"<<bestfit->ea<<endl;
						alott(&freehead,bestprev,bestfit,&head,p_id);
		   				m--;
					}
					}break;
			case 3://WORST-FIT
			{
				worstprev=NULL;
				freeprev=NULL;
		   		freecheck=freehead;
		   		n=0;
		   		if(m==0)
		   		cout<<"NO MEMORY BOCK AVAIABLE:"<<endl<<endl;
				while(m>0)
				{
						
				   	start_a=freecheck->sa;
					end_a=freecheck->ea;
					
					if((end_a-start_a)>=space)
					{
						if(worstfit==NULL)
						{
						worstprev=freeprev;	
						worstfit=freecheck;
						oldspace=(end_a-start_a);
						}
						else
						{
							if(oldspace<=(end_a-start_a))
							{
							worstprev=freeprev;	
							worstfit=freecheck;
							oldspace=(end_a-start_a);
							}
						
						}
						n=1;
					   
					}
			
					freeprev=freecheck;
					freecheck=freecheck->freelink;
					cout<<freecheck;
					if(freecheck==NULL)
					break;
					
			
				}//while
				if(n==0)
				cout<<"no such space available"<<endl;
			
				else
				{
				cout<<"\nALOTTED STARTING ADD.:"<<worstfit->sa<<endl;
				cout<<"ALOTTED END ADD::"<<worstfit->ea<<endl;
				alott(&freehead,worstprev,worstfit,&head,p_id);
		   		m--;
		  		
				}
			}break;
			
			default:cout<<"WRONG CHOICE:";
					break;	
			}//case 2 switch
		}break;
	



/*
	case 3:
		{
			cout<<"PROCESS ID:";
			cin>>p_id;
			
			m = m + free_mem(&head,&freehead,p_id);	
			
		}break;*/

		
	case 4:
		{   cout<<"\nTOTAL AVAILABLE SPACE:\n"<<m; 
			display_free(freehead);
		}
		break;


	case 5:
		{
				display_alott(head);
		}
		break;
		default:cout<<"\n WRONG CHOICE:\n";
				break;	
				
		

	}//switch
		cout<<"\n\nEnter 0 TO EXIT and 1 to continue  :";
		cin>>lop;
	}//while
	
}

void alott(struct freenode **frhead,struct freenode *prev,struct freenode *current,struct node **alloted_head,int id)
{
	
	struct node *tem,*tem1,*tem2;
	tem=(struct node*)malloc(sizeof(struct node));
	
	tem1=*alloted_head;
	tem2=NULL;
	
	while(1)
	{
	if(tem1==NULL)
	break;
	
	tem2=tem1;	
	tem1=tem1->link;
	}
	
	tem->pid=id;
	tem->sa=current->sa;
	tem->ea=current->ea;
	
	if(tem2==NULL)
	{
	*alloted_head=tem;
	}
	else
	tem2->link=tem;
	
	if(prev!=NULL)
	{
	(prev->freelink)=(current->freelink);
	}
	else
	*frhead=current->freelink;

//	current=NULL;
	
	
}








void display_alott(struct node *dis_head)
{
	struct node *distemp=NULL;
	distemp=dis_head;
	if(distemp==NULL)
	cout<<"NO BLOCK ALOTTED"<<endl;	
	while(distemp!=NULL)
	{
		cout<<"PROCESS ID:"<<distemp->pid;
		cout<<"\tSTART_ADD:"<<distemp->sa;
		cout<<"\tEND_ADD:"<<distemp->ea<<endl;
	
		distemp=distemp->link;	
	}
	
}

void display_free(struct freenode *dis_free)
{
	struct freenode *freedistemp=NULL;
	
	freedistemp=dis_free;
	
	if(freedistemp==NULL)
	cout<<"NO BLOCK AVAILABLE"<<endl;
		
	while(freedistemp!=NULL)
	{
		cout<<"\tSTART_ADD:"<<freedistemp->sa;
		cout<<"\tEND_ADD:"<<freedistemp->ea<<endl;
	
		freedistemp=freedistemp->freelink;	
	}
	
}
