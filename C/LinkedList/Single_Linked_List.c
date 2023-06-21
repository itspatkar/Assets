#include<stdio.h>
#include<stdlib.h>
#include<stdbool.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;

// Traversing Linked List : Counting Nodes -
// Time Complexity: O(n)
int countNode(struct node *head){
	int count=0;
	if(head == NULL)
		return 0;
	else {
		struct node *ptr = NULL;
		ptr=head;
		while(ptr != NULL){
			count++;
			ptr = ptr->next;
		}
		return count;
	}
}

// Traversing Linked List : Printing Nodes -
// Time Complexity: O(n)
void printNode(struct node *head){
	if(head == NULL)
		printf("Linked list is empty!\n");
	else {
		struct node *ptr = NULL;
		ptr=head;
		printf("Data:");
		while(ptr != NULL){
			printf(" %d",ptr->data);
			ptr = ptr->next;
		}
		printf("\n");
	}
}

// Inserting Node at End -
// Time Complexity: O(1)
struct node* insertEnd(struct node *head, int data){
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
	struct node *ptr = head;
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	while(ptr->next != NULL)
		ptr = ptr->next;
	ptr->next = temp;

	return head;
}

// Inserting Node at Beginning -
// Time Complexity: O(1)
struct node* insertBeg(struct node *head, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;
	temp->next = head;

	return temp;
}

/* Inserting Node at Beginning : Using Pass by referrence/address -
void insertBeg(struct node **head, int data){
	struct node *temp = (struct node*)malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = *head;
	*head = temp;
} */

// Inserting Node at Certain Position -
// Time Complexity: O(n)
struct node* insertPos(struct node *head, int data, int pos){
	if(pos == 1)
		head = insertBeg(head,data);
	else {
		struct node *temp = (struct node*)malloc(sizeof(struct node));
		temp->data = data;
		temp->next = NULL;

		struct node *ptr = NULL;
		ptr=head;
		int count=1;
		while(count != pos-1){
			ptr = ptr->next;
			count++;
		}
		/* Another logic -
		pos--;
		while(pos != 1){
			ptr = ptr->next;
			pos--
		}*/
		temp->next = ptr->next;
		ptr->next = temp;
	}

	return head;
}

// Deleting First Node -
// Time Complexity: O(1)
struct node* deleteFirst(struct node *head){
	if(head == NULL)
		printf("Linked list is empty!\n");
	else{
		struct node* temp = head;
		head = head->next;
		free(temp);
		temp = NULL;
		printf("First node deleted.\n");
	}

	return head;
}

// Deleting Last Node -
// Time Complexity: O(n)
void deleteLast(struct node *head){
	if(head == NULL)
		printf("Linked list is empty!\n");
	else if(head->next == NULL){
		free(head);
		head = NULL;
		printf("Last node deleted.\n");
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
		printf("Last node deleted.\n");
	}
}

// Deleting Node at Certain Position -
// Time Complexity: O(n)
struct node* deletePos(struct node *head, int pos){
	struct node *previous = head;
	struct node *current = head;

	if(head == NULL)
		printf("Linked list is empty!\n");
	else if(pos == 1){
		head = current->next;
		free(current);
		current = NULL;
		printf("Node deleted.\n");
	} else {
		while(pos != 1){
			previous = current;
			current = current->next;
			pos--;
		}
		previous->next = current->next;
		free(current);
		current = NULL;
		printf("Node deleted.\n");
	}

	return head;
}

// Deleting Entire Linked List -
// Time Complexity: O(n)
struct node* deleteLinkedList(struct node *head){
	struct node *temp = head;
	if(head == NULL)
		printf("Linked list is empty!\n");
	else {
		while(head->next != NULL){
			head = head->next;
			free(temp);
			temp = head;
		}
		free(head);
		head = temp = NULL;
		printf("Linked list deleted.\n");
	}

	return head;
}

// Reverse Linked List -
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
	printf("Linked list reversed.\n");

	return head;
}

int main(){
	int d, p, c, count;
	bool exit = false;
	struct node *current = NULL;
	
	// 1st Node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->next = NULL;

	// 2nd Node -
	current = malloc(sizeof(struct node));
	current->data = 20;
	current->next = NULL;
	head->next = current;

	// 3rd Node -
	/* Method 1 (it can't be used as it creates unnecessory pointers) -
	struct node *current2 = malloc(sizeof(struct node));
	current2->data = 30;
	current2->next = NULL;
	current->next = current2;
	printf("%d\n", current2->data); */
	// Method 2 -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->next = NULL;
	head->next->next = current;

	printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Count Nodes\n3. Print Nodes\n4. Insert Node at End\n5. Insert Node at Beginning\n6. Insert Node at Position\n7. Delete First Node\n8. Delete Last Node\n9. Delete Node at Position\n10. Delete Linked List\n11. Reverse Linked List\n");
	printf("_____________________________\n");
	
	while(!exit){
		printf("\nEnter Choice Number : ");
		scanf("%d",&c);

		switch(c){
			case 0:
				printf("Exiting...\n");
				exit = true;
				break;
			case 1:
				printf("Clearing screen...\n");
				system("clear");
				printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Count Nodes\n3. Print Nodes\n4. Insert Node at End\n5. Insert Node at Beginning\n6. Insert Node at Position\n7. Delete First Node\n8. Delete Last Node\n9. Delete Node at Position\n10. Delete Linked List\n11. Reverse Linked List\n");
				printf("_____________________________\n");
				break;
			case 2:
				count = countNode(head);
				if (count == 0)
					printf("Linked list is empty!\n");
				else
					printf("Nodes in Linked list = %d\n",count);
				break;
			case 3:
				printNode(head);
				break;
			case 4:
				printf("# Inserting Node at End:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				head = insertEnd(head,d);
				break;
			case 5:
				printf("# Inserting Node at Beginning:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				head = insertBeg(head,d);
				/* Pass by referrence/address -
				insertBeg(&head,d); */
				break;
			case 6:
				printf("# Inserting Node at Certain Position:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				printf("Enter Position: ");
				scanf("%d",&p);
				head = insertPos(head, d, p); // (head, data, position)
				break;
			case 7:
				printf("# Deleting First Node:\n");
				head = deleteFirst(head);
				break;
			case 8:
				printf("# Deleting Last Node:\n");
				deleteLast(head);
				break;
			case 9:
				printf("# Deleting Node at Certain Position:\n");
				printf("Enter Position: ");
				scanf("%d",&p);
				head = deletePos(head, p); // (head, position)
				break;
			case 10:
				printf("# Deleting Entire Linked List:\n");
				head = deleteLinkedList(head);
				break;
			case 11:
				printf("# Reverse Linked List:\n");
				head = reverseLinkedList(head);
				break;
			default:
				printf("Incorrect Choice!\n");
		}
	}

	return 0;
}
