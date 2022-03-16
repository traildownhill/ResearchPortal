#include<stdio.h>
#include<conio.h>
#include<stdlib.h>
#include<string.h>


FILE *sp,*ip,*tp;

char POT[][7]={"START","END","LTORG","EQU","ORIGIN"};

char MOT[][6]={"MOVER","MOVEM","ADD","SUB","MUL","DIV"};

char reg[][5]={"AREG","BREG","CREG","DREG"};

char declstat[][3]={"DC","DS"};

int POOLTAB [10];

int countl=0,counts=0,countp=0,p;

 

typedef struct symbol

{

int symbol_no;

char symbol_name [10];

int symbol_addr;

}symbol;

 

typedef struct litral

{

int litral_no;

char litral_name[10];

int litral_addr;

}litral;

symbol s[10];

litral l[10];

 

int search_in_POT(char tok1[10])

{

int i,e;

for(i=0;i<5;i++)

{

e = strcmp(tok1,POT[i]);

if(e==0)

{

return(i+1);

}

}

return(-1);

}

int search_in_MOT(char tok1[10])

{

int i,e;

for(i=0;i<6;i++)

{

e = strcmp(tok1,MOT[i]);

if(e==0)

{

return(i+1);

}

}

return(-1);

}

 

int search_in_reg(char tok1[10])

{

int i,e;

for(i=0;i<4;i++)

{

e = strcmp(tok1,reg[i]);

 

if(e==0)

{

return(i+1);

}

}

return(-1);

}

 

int search_in_DL(char tok1[10])

{

int i,e;

for(i=0;i<2;i++)

{

e = strcmp(tok1,declstat[i]);

if(e==0)

{

return(i+1);

}

}

return(-1);

}

 

int search_in_symbol_tab(char tok1[10],int counts)

{

int i,e;

for(i=0;i<=counts;i++)

{

e = strcmp(tok1,s[i].symbol_name);

if(e==0)

{

return(i);

}

}

return(-1);

}

 

int litral_value(char tok2[10])

{

int i,len,i1=0;

char a[5];

len=strlen(tok2);

tok2[len-1]='\0';

for(i=2;tok2[i]!='\0';i++,i1++)

a[i1]=tok2[i];

a[i1]='\0';

//printf("a= %s  tok2= %s",a,tok2);

return(atoi(a));

}

 

void pass1()

{

int lc=0,ch,i=0,j,p,n,m,m1,m2,m3,m4,e,k1,a=0,ltorg=0,litral=0,value,x;

char buffer[80],tok1[10],tok2[10],tok3[10],tok4[10];

sp=fopen("asm.txt","r");

ip=fopen("ir.txt","w");

while(fgets(buffer,80,sp))

{

n = sscanf(buffer,"%s%s%s%s",tok1,tok2,tok3,tok4);

switch(n)

{

case 1 :                                                                                                                                   //END                                                                                          m = search_in_POT(tok1);

POOLTAB[countp] = l[a].litral_no;

a = a+litral;

countp++;

litral=0;

if(m==2)

{

x=lc;

for(i=POOLTAB[countp-1];i<=countl;i++)

{

l[i-1].litral_addr = lc;

lc++;

}

for(i=POOLTAB[countp-1];i<=countl;i++)

{

value=litral_value(l[i-1].litral_name);

fprintf(ip,"AD 0%d %d\n",m,value);

x++;

}

}

else

{

if(ltorg==0)

{

for(i=0;i<countl;i++)

{

l[i].litral_addr = lc;

value=litral_value(l[i].litral_name);

fprintf(ip,"AD 0%d %d\n",m,value);

lc++;

}

}

else

{

for(i=POOLTAB[countp-1];i<=countl;i++)

{

l[i-1].litral_addr = lc;

value=litral_value(l[i-1].litral_name);

fprintf(ip,"AD 0%d %d\n",m,value);

lc++;

}

}

ltorg++;

}

if(m==1)

{

lc=0;

fprintf(ip,"AD 0%d C %d\n",m,lc);

}

break;

 

case 2 : m = search_in_POT(tok1);  //START 200

if(m==1)

{

lc = atoi(tok2);

fprintf(ip,"AD 0%d C %d\n",m,lc);

}

else

{

lc = atoi(tok2);

}

break;

 

case 3 : m1 = search_in_MOT(tok1);

m2 = search_in_reg(tok2);

m3 = search_in_POT(tok2);

if(m1>=01)

{

if(tok3[1]=='=')

{

l[countl].litral_no = countl+1;

strcpy(l[countl].litral_name,tok3);

fprintf(ip,"IS 0%d %d L%d\n",m1,m2,l[countl].litral_no);

countl++;

litral++;

}

else

{

int m11=search_in_symbol_tab(tok3,counts);

if(m11==-1)

{

s[counts].symbol_no = counts+1;

strcpy(s[counts].symbol_name,tok3);

}

fprintf(ip,"IS 0%d %d S %d\n",m1,m2,s[counts].symbol_no);

counts++;

}

}

else

{

if(strcmp(tok2,"DC")==0)

{

m4=search_in_symbol_tab(tok1,counts);

s[m4].symbol_addr = lc;

k1=atoi(tok3);

fprintf(ip,"AD 05 C %d\n",k1);

}

else

if(strcmp(tok2,"DS")==0)

{

m4=search_in_symbol_tab(tok1,counts);

s[m4].symbol_addr = lc;

x=lc;

k1=atoi(tok3);

lc = lc + k1 - 1;

fprintf(ip,"AD 06 C %d\n",k1);

}

}

if(m3==4)

{

m4=search_in_symbol_tab(tok3,counts);

s[counts].symbol_no = counts+1;

strcpy(s[counts].symbol_name,tok1);

s[counts].symbol_addr=  s[m4].symbol_addr;

counts++;

lc--;

}

lc++;

break;

 

case 4 :

s[counts].symbol_no = counts+1;

strcpy(s[counts].symbol_name,tok1);

s[counts].symbol_addr = lc;

counts++;

m1 = search_in_MOT(tok2);

m2 = search_in_reg(tok3);

if(m1>=01)

{

if(tok3[1]=='=')

{

 

l[countl].litral_no = countl+1;

strcpy(l[countl].litral_name,tok4);

fprintf(ip,"IS 0%d %d L %d\n",m1,m2,l[countl].litral_no);

countl++;

litral++;

}

else

{

int m11=search_in_symbol_tab(tok4,counts);

if(m11==-1)

{

s[counts].symbol_no = counts+1;

strcpy(s[counts].symbol_name,tok4);

}

fprintf(ip,"IS 0%d %d S %d\n",m1,m2,s[counts].symbol_no);

counts++;

}

}

else

{

if(strcmp(tok3,"DC")==0)

{

m4=search_in_symbol_tab(tok2,counts);

s[m4].symbol_addr = lc;

k1=atoi(tok4);

fprintf(ip,"AD 05 C %d\n",k1);

}

else

if(strcmp(tok3,"DS")==0)

{

m4=search_in_symbol_tab(tok2,counts);

s[m4].symbol_addr = lc;

x=lc;

k1=atoi(tok4);

fprintf(ip,"AD 06 C %d\n",k1);

}

}

lc++;

break;

}

}

fclose(ip);

}

 

void disp_intermediate()

{

char chr;

ip=fopen("ir.txt","r");

printf("\n\tIntermediate Code:-\n");

while(!feof(ip))

{

chr=fgetc(ip);

printf("%c",chr);

}

}

 

void disp_symbol_table()

{

printf("\n*****Symbol Table*****\n");

printf("————————-\n");

printf("|S_no\t|S_name\t|S_addr\t|\n");

printf("————————-\n");

for(p=0;p<counts;p++)

{

printf("|%d\t|%s\t|%d\t|\n",s[p].symbol_no,s[p].symbol_name,s[p].symbol_addr);

}

printf("————————-\n");

}

 

void disp_litral_table()

{

printf("\n*****Litral Table*****\n");

printf("————————-\n");

printf("|L_no\t|L_name\t|L_addr\t|\n");

printf("————————-\n");

for(p=0;p<countl;p++)

{

printf("|%d\t|%s\t|%d\t|\n",l[p].litral_no,l[p].litral_name,l[p].litral_addr);

}

printf("————————-\n");

}

 

void disp_pool_table()

{

printf("\n\t*****POOLTAB*****\n");

printf("\t—————-\n");

printf("\t|P_no\t|Index\t|\n");

printf("\t—————-\n");

for(p=0;p<countp;p++)

{

printf("\t|%d\t|%d\t|\n",(p+1),POOLTAB[p]);

}

printf("\t—————-\n");

}

 

int main()

{

int ch;

char chr;

clrscr();

do

{

printf("\n\tMENU");

printf("\n1.Display Assembly Language Code");

printf("\n2.Generate Intermediate Code");

printf("\n3.Display Symbol Table");

printf("\n4.Display Literal Table");

printf("\n5.Display Pool Table");

printf("\n6.Exit");

printf("\nEnter your choice: ");

scanf("%d",&ch);

switch(ch)

{

case 1:

sp=fopen("asm.txt","r");

printf("\n\tAssemby Language Code:-\n");

while(!feof(sp))

{

chr=fgetc(sp);

printf("%c",chr);

}

fclose(sp);

break;

case 2:

pass1();

disp_intermediate();

break;

case 3:

disp_symbol_table();

break;

case 4:

disp_litral_table();

break;

case 5:

disp_pool_table();

break;

case 6:

exit(0);

default:

printf("\nInvalid Choice…..");

}

}while(ch!=6);

getch();
return 0;

}
