#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *link;
};

struct node *head = NULL;
struct node *current = NULL;

void printData(struct node *head){
	if(head == NULL)
		printf("Linked list is empty.");
	struct node *ptr = NULL;
	ptr=head;
	printf("\nData:");
	while(ptr != NULL){
		printf(" %d",ptr->data);
		ptr = ptr->link;
	}
}

void insertNodeAtEnd(struct node *head, int data){
	struct node *ptr, *temp;
	ptr=head;
	temp=(struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->link = NULL;
	while(ptr->link != NULL)
		ptr = ptr->link;
	ptr->link = temp;
}

int main(int argc, char const *argv[]){
	// 1st node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->link = NULL;

	// 2nd node -
	current = malloc(sizeof(struct node));
	current->data = 20;
	current->link = NULL;
	head->link = current;

	// 3rd node -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->link = NULL;
	head->link->link = current;

	printData(head);

	insertNodeAtEnd(head,40);
	printData(head);

	insertNodeAtEnd(head,50);
	printData(head);
	
	return 0;
}
