#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;
struct node *current = NULL;

void countNode(struct node *head){
	int count=0;
	if(head == NULL)
		printf("nexted list is empty.");
	struct node *ptr = NULL;
	ptr=head;
	while(ptr != NULL){
		count++;
		ptr = ptr->next;
	}
	printf("Nodes= %d",count);
}

void printData(struct node *head){
	if(head == NULL)
		printf("nexted list is empty.");
	struct node *ptr = NULL;
	ptr=head;
	printf("\nData:");
	while(ptr != NULL){
		printf(" %d",ptr->data);
		ptr = ptr->next;
	}
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

	// Traversing Linked List -
	countNode(head);
	printData(head);
	
	return 0;
}
