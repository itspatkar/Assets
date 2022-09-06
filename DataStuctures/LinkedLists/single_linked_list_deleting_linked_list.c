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
	current = insertNodeAtEnd(current, 50);
	printData(head);

	head = insertNodeAtBeginning(head,5);
	printData(head);
	head = insertNodeAtBeginning(head,15);
	printData(head);

	insertNodeAtPos(head, 25, 3); // (head, data, position)
	printData(head);

	head = deleteFirstNode(head);
	printData(head);
	head = deleteFirstNode(head);
	printData(head);

	deleteLastNode(head);
	printData(head);
	deleteLastNode(head);
	printData(head);

	head = deleteAtPosNode(head, 3); // (head, position)
	printData(head);

	head = deleteLinkedList(head);
	printData(head);

	return 0;
}
