#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;

int main(){
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 20;
	head->next = NULL;

	printf("Data: %d", head->data);
	
	return 0;
}
