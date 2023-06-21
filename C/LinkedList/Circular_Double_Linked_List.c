#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *prev;
	struct node *next;
};

struct node *tail = NULL;

void printNode(struct node *tail){
	if(tail == NULL)
		printf("Linked list is empty!\n");
	else {
		struct node *ptr = tail->next;
		printf("Data:");
		do {
			printf(" %d",ptr->data);
			ptr = ptr->next;
		} while(ptr != tail->next);
		printf("\n");
	}
}

struct node* insertEmpty(int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = temp;
	temp->data = data;
	temp->next = temp;

	return temp;
}

struct node* insertBeg(struct node *tail, int data){
	struct node *temp = insertEmpty(data);
	if (tail == NULL) return temp;
	temp->next = tail->next;
	tail->next->prev = temp;
	temp->prev = tail;
	tail->next = temp;

	return tail;
}

struct node* insertEnd(struct node *tail, int data){
	struct node *temp = insertEmpty(data);
	if(tail == NULL) return temp;
	temp->prev = tail;
	temp->next = tail->next;
	tail->next = temp;
	tail->next->prev = temp;

	return temp;
}

struct node* insertPos(struct node *tail, int data, int pos){
	struct node *temp = insertEmpty(data);
	if(tail == NULL) return temp;
	if (pos == 1) insertBeg(tail,data);
	else {
		struct node *ptr = tail->next;
		int count = 1;
		while(count != pos-1){
			ptr = ptr->next;
			count++;
		}
		temp->next = ptr->next;
		temp->prev = ptr;
		ptr->next->prev = temp;
		ptr->next = temp;
	}
	if (temp == tail) tail = tail->next;

	return tail;
}

struct node* deleteFirst(struct node *tail){
	if (tail == NULL) return tail;
	struct node *temp = tail->next;
	if(temp == tail){
		free(tail);
		tail = NULL;
	}
	tail->next = tail->next->next;
	tail->next->prev = tail;
	free(temp);

	return tail;
}

struct node* deleteLast(struct node *tail){
	if (tail == NULL) return tail;
	struct node *temp = tail;
	tail->next->prev = tail->prev;
	tail->prev->next = tail->next;
	tail = tail->prev;
	free(temp);

	return tail;
}

struct node* deletePos(struct node *tail, int pos){
	if(tail == NULL) return tail;
	if (pos == 1) deleteFirst(tail);
	else {
		struct node *ptr = tail->next;
		int count = 1;
		while(count != pos){
			ptr = ptr->next;
			count++;
		}
		ptr->prev->next = ptr->next;
		ptr->next->prev = ptr->prev;
		free(ptr);
		if(tail->next == tail) tail = tail->next->prev;
	}

	return tail;
}

int main(){
	tail = insertEmpty(10);
	printNode(tail);

	tail = insertBeg(tail,20);
	tail = insertBeg(tail,30);
	printNode(tail);

	tail = insertEnd(tail,40);
	tail = insertEnd(tail,50);
	printNode(tail);

	tail = insertPos(tail,60,3);
	printNode(tail);

	tail = deleteFirst(tail);
	printNode(tail);

	//tail = deleteLast(tail);
	printNode(tail);

	tail = deletePos(tail,2);
	printNode(tail);

	return 0;
}