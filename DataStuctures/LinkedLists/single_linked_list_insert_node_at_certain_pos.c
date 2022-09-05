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

struct node* insertNodeAtEnd(struct node *current, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	current->next = temp;
	return temp;
}

struct node* insertNodeAtBeginning(struct node *head, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = head;
	return temp;
}

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

int main(int argc, char const *argv[]){
	// 1st node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->next = NULL;

	printData(head);

	current = head;
	current = insertNodeAtEnd(current, 20);
	current = insertNodeAtEnd(current, 30);
	current = insertNodeAtEnd(current, 40);
	printData(head);

	head = insertNodeAtBeginning(head,5);
	printData(head);

	head = insertNodeAtBeginning(head,15);
	printData(head);

	insertNodeAtPos(head, 25, 3); // (head, data, position)
	printData(head);

	return 0;
}
