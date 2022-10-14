#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *prev;
	struct node *next;
};

struct node *tail = NULL;

struct node* circularDouble(int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = temp;
	temp->data = data;
	temp->next = temp;
	return temp;
}

int main(){
	tail = circularDouble(10);
	printf("%d\n",tail->data);

	return 0;
}
