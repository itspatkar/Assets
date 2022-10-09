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
		struct node *ptr = head;
		printf("\nData:");
		while(ptr != NULL){
			printf(" %d",ptr->data);
			ptr = ptr->next;
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
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = NULL;
	struct node *ptr = head;
	while(ptr->next != NULL)
		ptr = ptr->next;
	temp->prev = ptr;
	ptr->next = temp;
	return head;
}

// Inserting Node at Certain Position in Linked List -
struct node* insertAtPos(struct node *head, int data, int pos){
	if(pos == 1)
		head = insertAtBeg(head,data);
	else {
		struct node *temp = malloc(sizeof(struct node));
		temp->prev = NULL;
		temp->data = data;
		temp->next = NULL;
		struct node *ptr = head;
		struct node *ptr2 = head;
		int count = 1;
		while(count != pos-1){
			ptr = ptr->next;
			ptr2 = ptr->next->next;
			count++;
		}
		/* Another Logic:
		while(pos != 1){
			temp = temp->next;
			pos--;
		}*/
		if(ptr->next == NULL){
			ptr->next = temp;
			temp->prev = ptr;
		} else {
			temp->prev = ptr;
			temp->next = ptr->next;
			ptr->next = temp;
			ptr2->prev = temp;
		}
	}
	return head;
}

// Deleting First Node of Linked List -
struct node* deleteFirstNode(struct node *head){
	head = head->next;
	free(head->prev);
	head->prev = NULL;
	return head;
}

// Deleting Last Node of Linked List -
void deleteLastNode(struct node *head){
	struct node *ptr = head;
	while(ptr->next->next != NULL)
		ptr = ptr->next;
	free(ptr->next);
	ptr->next = NULL;
}

// Deleting Node at Certain Position in Linked List -
struct node* deleteAtPosNode(struct node *head, int pos){
	struct node *ptr = head;
	if(head == NULL)
		printf("\nLinked list is already empty!");
	else if(pos == 1)
		head = deleteFirstNode(head);
	else {
		while(pos > 1){
			ptr = ptr->next;
			pos--;
		}
		if (ptr->next == NULL)
			deleteLastNode(head);
		else {
			ptr->prev->next = ptr->next;
			ptr->next->prev = ptr->prev;
			free(ptr);
		}
	}
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
	printf("\n\n# Inserting Node at Beggining :");
	head = insertAtBeg(head,20);
	printData(head);

	// Inserting Node at End of Linked List -
	printf("\n\n# Inserting Node at End :");
	head = insertAtEnd(head,30);
	head = insertAtEnd(head,40);
	printData(head);

	// Inserting Node at Certain Position in Linked List -
	printf("\n\n# Inserting Node at Pos :");
	head = insertAtPos(head,50,3);
	printData(head);
	head = insertAtPos(head,60,2);
	printData(head);
	head = insertAtPos(head,70,1);
	printData(head);

	// Deleting First Node of Linked List -
	printf("\n\n# Deleting First Node :");
	head = deleteFirstNode(head);
	printData(head);

	// Deleting Last Node of Linked List -
	printf("\n\n# Deleting Last Node :");
	deleteLastNode(head);
	printData(head);

	// Deleting Node at Certain Position in Linked List -
	printf("\n\n# Deleting Node at Certain Position :");
	head = deleteAtPosNode(head, 3);
	printData(head);

	return 0;
}
