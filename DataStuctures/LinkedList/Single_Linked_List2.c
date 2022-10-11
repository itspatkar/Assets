#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;
struct node *current = NULL;

// Traversing Single Linked List : Counting nodes -
// Time Complexity: O(n)
void countNode(struct node *head){
	int count=0;
	if(head == NULL)
		printf("\nLinked list is empty.");
	else {
		struct node *ptr = NULL;
		ptr=head;
		while(ptr != NULL){
			count++;
			ptr = ptr->next;
		}
		printf("Nodes in Linked list = %d",count);
	}
}

// Traversing Single Linked List : Printing data -
// Time Complexity: O(n)
void printData(struct node *head){
	if(head == NULL)
		printf("\nLinked list is empty.");
	else {
		struct node *ptr = NULL;
		ptr=head;
		printf("\nData:");
		while(ptr != NULL){
			printf(" %d",ptr->data);
			ptr = ptr->next;
		}
	}
}

// Inserting Node at End of Linked List -
// Time Complexity: O(1)
struct node* insertNodeAtEnd(struct node *current, int data){
	/* Logic 1
	// Time Complexity with traversal: O(n) -
	struct node *ptr, *temp;
	ptr=head;
	temp=(struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;
	while(ptr->next != NULL)
		ptr = ptr->next;
	ptr->next = temp;
	Better Logic - */
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	current->next = temp;
	return temp;
}

// Inserting Node at Beginning of Linked List -
// Time Complexity: O(1)
struct node* insertNodeAtBeginning(struct node *head, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = head;
	return temp;
}

/* Inserting Node at Beginning of Linked List : Using Pass by referrence/address -
void insertNodeAtBeginning(struct node **head, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = *head;
	*head = temp;
} */

// Inserting Node at Certain Position in Linked List -
// Time Complexity: O(n)
void insertNodeAtPos(struct node *head, int data, int pos){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	struct node *ptr = NULL;
	ptr=head;
	int count=1;
	while(count != pos-1){
		count++;
		ptr = ptr->next;
	}

	temp->next = ptr->next;
	ptr->next = temp;

	/* Another logic -
	pos--;
	while(pos != 1){
		ptr = ptr->next;
		pos--
	} */
}

// Deleting First Node of Linked List -
// Time Complexity: O(1)
struct node* deleteFirstNode(struct node *head){
	if(head == NULL)
		printf("\nLinked list is already empty!");
	else{
		struct node* temp = head;
		head = head->next;
		free(temp);
		temp = NULL;
	}
	return head;
}

// Deleting Last Node of Linked List -
// Time Complexity: O(n)
void deleteLastNode(struct node *head){
	if(head == NULL)
		printf("\nLinked list is already empty!");
	else if(head->next == NULL){
		free(head);
		head = NULL;
	} else{
		struct node* temp = head;
		//struct node* tempN = head;
		while(temp->next->next != NULL){
			//tempN = temp;
			temp = temp->next;
		}
		//tempN->next = NULL;
		free(temp->next);
		temp->next = NULL;
	}
}

// Deleting Node at Certain Position in Linked List -
// Time Complexity: O(n)
struct node* deleteAtPosNode(struct node *head, int pos){
	struct node *previous = head;
	struct node *current = head;
	if(head == NULL)
		printf("\nLinked list is already empty!");
	else if(pos == 1){
		head = current->next;
		free(current);
		current = NULL;
	} else {
		while(pos != 1){
			previous = current;
			current = current->next;
			pos--;
		}
		previous->next = current->next;
		free(current);
		current = NULL;
	}
	return head;
}

// Deleting Entire Linked List -
// Time Complexity: O(n)
struct node* deleteLinkedList(struct node *head){
	struct node *temp = head;
	while(head->next != NULL){
		head = head->next;
		free(temp);
		temp = head;
	}
	free(head);
	head = temp = NULL;
	return head;
}

// Reverse Single Linked List -
// Time Complexity: O(n)
struct node* reverseLinkedList(struct node* head){
	struct node* prevT = NULL;
	struct node* nextT = NULL;
	while(head != NULL){
		nextT = head->next;
		head->next = prevT;
		prevT = head;
		head = nextT;
	}
	head = prevT;
	return head;
}

int main(){
	// 1st node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->next = NULL;

	// 2nd node -
	current = malloc(sizeof(struct node));
	current->data = 20;
	current->next = NULL;
	head->next = current;

	// 3rd node (two methods) -
	/* method 1 (it can't be used as it creates unnecessory pointers) -
	struct node *current2 = malloc(sizeof(struct node));
	current2->data = 30;
	current2->next = NULL;
	current->next = current2;
	printf("%d\n", current2->data); */
	// method 2 -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->next = NULL;
	head->next->next = current;

	// Traversing Linked List -
	printf("# Traversing Linked List :\n");
	countNode(head);
	printData(head);

	// Inserting Node at End of Linked List -
	printf("\n\n# Inserting Node at End of Linked List :");
	current = head;
	current = insertNodeAtEnd(current, 20);
	current = insertNodeAtEnd(current, 30);
	current = insertNodeAtEnd(current, 40);
	current = insertNodeAtEnd(current, 50);
	printData(head);
	/* Pass by referrence/address -
	insertNodeAtBeginning(&head,5);
	printData(head); */

	// Inserting Node at Beginning of Linked List -
	printf("\n\n# Inserting Node at Beginning of Linked List :");
	head = insertNodeAtBeginning(head,5);
	printData(head);
	head = insertNodeAtBeginning(head,15);
	printData(head);

	// Inserting Node at Certain Position in Linked List -
	printf("\n\n# Inserting Node at Certain Position of Linked List :");
	insertNodeAtPos(head, 25, 3); // (head, data, position)
	printData(head);

	// Deleting First Node of Linked List -
	printf("\n\n# Deleting First Node of Linked List :");
	head = deleteFirstNode(head);
	printData(head);
	head = deleteFirstNode(head);
	printData(head);

	// Deleting Last Node of Linked List -
	printf("\n\n# Deleting Last Node of Linked List :");
	deleteLastNode(head);
	printData(head);
	deleteLastNode(head);
	printData(head);

	// Deleting Node at Certain Position in Linked List -
	printf("\n\n# Deleting Node at Certain Position of Linked List :");
	head = deleteAtPosNode(head, 3); // (head, position)
	printData(head);

	// Deleting Entire Linked List -
	printf("\n\n# Deleting Entire Linked List :");
	head = deleteLinkedList(head);
	printData(head);

	// Reverse Single Linked List -
	printf("\n\n# // Reverse Single Linked List :");
	head = insertNodeAtBeginning(head,10);
	head = insertNodeAtBeginning(head,20);
	head = insertNodeAtBeginning(head,30);
	head = insertNodeAtBeginning(head,40);
	head = insertNodeAtBeginning(head,50);
	printData(head);
	head = reverseLinkedList(head);
	printData(head);

	switch(c){
		case 1:
		
		break;
		default:
	}

	return 0;
}
