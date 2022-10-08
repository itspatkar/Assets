#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *prev;
	struct node *next;
};

struct node *head = NULL;
struct node *current = NULL;

// Traversing Doubly Linked List : Printing data -
void printData(struct node *head){
	if(head == NULL)
		printf("\nList is empty!");
	else {
		struct node *temp = head;
		printf("\nData:");
		while(temp != NULL){
			printf(" %d",temp->data);
			temp = temp->next;
		}
	}
}

// Insert Node in Empty Doubly Linked List -
struct node* addToEmpty(struct node *head, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = NULL;
	return temp;
}

// Insert Node at Beggining of Doubly Linked List -
struct node* insertAtBeg(struct node *head, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = head;
	head->prev = temp;
	return temp;
}

// Insert Node at End of Doubly Linked List -
struct node* insertAtEnd(struct node *head, int data){
	current = head;
	while(current->next != NULL)
		current = current->next;
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = current;
	temp->data = data;
	temp->next = NULL;
	current->next = temp;
	return head;
}

int main(){
	/*struct node *head = malloc(sizeof(struct node));
	head->prev = NULL;
	head->data = 10;
	head->next = NULL;*/

	// Inserting Node in Empty Linked List -
	printf("# Inserting Node in Empty List :");
	head = addToEmpty(head,10);
	printData(head);

	// Inserting Node at Beggining of Linked List -
	printf("\n\n# Inserting Node at Beggining:");
	head = insertAtBeg(head,20);
	printData(head);

	// Inserting Node at End of Linked List -
	printf("\n\n# Inserting Node at End:");
	head = insertAtEnd(head,30);
	head = insertAtEnd(head,40);
	printData(head);

	return 0;
}
