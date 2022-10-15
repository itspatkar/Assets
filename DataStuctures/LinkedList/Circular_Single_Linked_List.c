#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *tail = NULL;

// Traversing Linked List : Printing data -
void printData(struct node *tail){
	struct node *ptr = tail->next;
	printf("\nData:");
	do {
		printf(" %d",ptr->data);
		ptr = ptr->next;
	} while(ptr != tail->next);
}

// Insert Node in Empty Linked List -
struct node* addToEmpty(int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = temp;
	return temp;
}

// Inserting Node at Beggining of Linked List -
struct node* insertAtBeg(struct node *tail, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;
	temp->next = tail->next;
	tail->next = temp;
	return tail;
}

// Insert Node at End of Linked List -
struct node* insertAtEnd(struct node *tail, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;
	temp->next = tail->next;
	tail->next = temp;
	tail = tail->next;
	return tail;
}

// Inserting Node at Certain Position in Linked List -
struct node* insertAtPos(struct node *tail, int data, int pos){
	if(pos == 1)
		tail = insertAtBeg(tail,data);
	else {
		struct node *temp = malloc(sizeof(struct node));
		temp->data = data;
		temp->next = NULL;
		struct node *ptr = tail->next;
		int count = 1;
		while(count != pos-1){
			ptr = ptr->next;
			count++;
		}
		if(ptr->next == tail){
			tail = insertAtEnd(tail,data);
		}
		else {
			temp->next = ptr->next;
			ptr->next = temp;
		}
	}
	return tail;
}

int main(){
	// Inserting Node in Empty Linked List -
	printf("# Inserting Node in Empty List :");
	tail = addToEmpty(10);
	printData(tail);

	// Inserting Node at Beggining of Linked List -
	printf("\n\n# Inserting Node at Beggining :");
	tail = insertAtBeg(tail,20);
	tail = insertAtBeg(tail,30);
	printData(tail);

	// Inserting Node at End of Linked List -
	printf("\n\n# Inserting Node at End :");
	tail = insertAtEnd(tail,40);
	tail = insertAtEnd(tail,50);
	printData(tail);

	// Inserting Node at Certain Position in Linked List -
	printf("\n\n# Inserting Node at Certain Position :");
	tail = insertAtPos(tail, 25, 5);
	printData(tail);

	return 0;
}
