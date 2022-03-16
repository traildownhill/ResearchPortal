#include<iostream.h>
#include<conio.h>
#include<stdio.h>
#include<stdlib.h>
#include<string.h>
int symi=0,lc=0,len=1,dc=0,start=0;
struct pgm
 {
   char line[80];
 } s[100];
struct symtab
 {
   char name[10];
   int add;
 } sym[100];
void show(char* a,char* b,char* c)
 {
   printf("%8s %5s %6s \n",a,b,c);
 }
void check(char s[])
 {
   if(!strcmpi(s,"START"))
   {
     start=1;
     show("","START","1");
     return;
   }
   if(!strcmpi(s,"END"))
    {
      show("","END","1");
      return;
    }
    if(!strcmpi(s,"EQU"))
     {
       show("","EQU","1");
       return;
    }
   if(!strcmpi(s,"DS"))
    {
      show("","DS","1");
      return;
    }
  if(!strcmpi(s,"ORG"))
   {
   show("","ORG","1");
   return;
 }
if(!strcmpi(s,"DC"))
 {
   show("","DC","1");
   return;
 }
if(start)
 {
   start=0;
   lc=atoi(s);
   return;
 }
if(dc)
 {
   dc=0;
   len=atoi(s);
   show("","DS",s);
   return;
 }
for(int i=0;i<symi;i++)
 {
    if(strcmp(sym[i].name,s)==0)
    return;
 }
if(s[0]=='\'')
 {
   char p[2];
   sprintf(p,"LIT : %s",s);
   show(p,"-","-");
   return;
 }
strcpy(sym[symi++].name,s);
show(s,"-","-");
return;
}
void main()
 {
   char t[20];
   int i=0,j=0,k=0;
   cout<<"Enter the Program code:";
   do
    {
     gets(s[i].line);
    }
   while(strcmpi(s[i++].line,"end"));
   printf("Systab Optab Length \n");
   printf("---------------------");
   k=-1;
   do
     {
       k++;
       for(i=0;s[k].line[i]!='\o';i++,j++)
      {
        if(s[k].line[i]==' ')
        {
          t[j]='\o';
          j=-1;
          check(t);
        }
       else
         t[j] = s[k].line[i];
     }
       t[j]='\o';
       j=0;
      check(t);
  }
while(strcmpi(s[k].line,"End"));
getch();
}
