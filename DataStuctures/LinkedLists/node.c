#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;

int main(int argc, char const *argv[]){
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 20;
	head->next = NULL;

	printf("%d", head->data);
	
	return 0;
}
