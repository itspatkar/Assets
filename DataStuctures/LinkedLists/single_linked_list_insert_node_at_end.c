#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
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
		ptr = ptr->next;
	}
}

void insertNodeAtEnd(struct node *head, int data){
	struct node *ptr, *temp;
	ptr=head;
	temp=(struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;
	while(ptr->next != NULL)
		ptr = ptr->next;
	ptr->next = temp;
}

int main(int argc, char const *argv[]){
	// 1st node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->next = NULL;

	// 2nd node -
	current = malloc(sizeof(struct node));
	current->data = 20;
	current->next = NULL;
	head->next = current;

	// 3rd node -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->next = NULL;
	head->next->next = current;

	printData(head);

	insertNodeAtEnd(head,40);
	printData(head);

	insertNodeAtEnd(head,50);
	printData(head);
	
	return 0;
}
